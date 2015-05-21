<?php

require_once __DIR__ . '/../../../bootstrap.php';


date_default_timezone_set('Asia/Shanghai');
$time = time();

$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
$_SERVER['SCRIPT_NAME'] = 'debug.php';

$settings = Vars::getSettings();

// load ding tie messages
$messages = $settings['dingtie_messages'];


for ($counter = 0; $counter < 10; $counter++) {
            // get a valid user
            $user;
            if ($user = TigtagUser::getFirstValidUserWithMaxRank(150)) {

              $user->setLastUsed(time());
              $user->save();

              // first request to get formhash
              $crawler = new Crawler();
              $crawler->setCookiePath($user->getCookiePath());
            //  $crawler->setUseTor();
              $crawler->setHeader(array(
                  'Referer: http://bbs.tigtag.com/forum.php?mod=viewthread&tid=3160720&pid=31999233',
              ));
              $url = "http://bbs.tigtag.com/forum.php?mod=post&action=reply&fid=$fid&tid=$tid";

              $html = $crawler->read($url);
              $matches = array();
              preg_match('/id="formhash" value="([^"]+)"/', $html, $matches);
              $formhash = isset($matches[1]) ? $matches[1] : null;

              // Check if we need to do an extra secqaa verification
              $secquestion;
              $secanswer;
              $sechash;
              if (preg_match('/id="secqaaverify_([^"]+)"/', $html, $matches)) {
                $secqaa_code = $matches[1];
                $crawler->setHeader(array(
                    'Referer: ' . $url,
                ));

                // do math seccode verification, try for 5 times
                $secverification_success = false;
                for ($i = 0; $i < 7; $i++) {
            $html = $crawler->read("http://bbs.tigtag.com/misc.php?mod=secqaa&action=update&idhash=$secqaa_code&inajax=1&ajaxtarget=secqaa_$secqaa_code");
                  $html = iconv('GBK', 'UTF-8', $html);
                  $secquestion = $html;
              //die($html);
                  if (preg_match('/(\d+) ?([\+\-*\/]) ?(\d+) ?= ?/', $html, $matches)) {
                    $first = intval($matches[1]);
                    $operand = $matches[2];
                    $second = $matches[3];
                    $result;
                    if ($operand == '+') {
                      $result = $first + $second;
                    } else if ($operand == '-') {
                      $result = $first - $second;
                    } else if ($operand == '*') {
                      $result = $first * $second;
                    } else if ($operand == '/') {
                      $result = $first / $second;
                    }

                    if (!preg_match('/\-?\d+/', $result)) {
                      $msg = 'Error when doing secqaa code verification. $html = ' . htmlentities($html);
                      $log = new Log('cron', Log::ERROR, $msg);
                      $log->save();
//                      sendemailAdmin('Dingtie: Error', $msg);
                    } else {
                      $secanswer = $result;
                      $sechash = $secqaa_code;
                    }
                    $html = $crawler->read("http://bbs.tigtag.com/misc.php?mod=secqaa&action=check&inajax=1&&idhash=$sechash&secverify=$secanswer");

                    if (strpos($html, 'succeed')) {
                      $secverification_success = true;
                      break;
                    } else {
                      continue;
                    }
                  }
                } // end for
                if ($secverification_success == false) {
                  echo "Error - math verification failed.\n";
                    $log = new Log('cron', Log::ERROR, "Error - math verification failed.");
                    $log->save();
//                  sendemailAdmin('Dingtie: Error - math verification failed. ', 'Tried 7 times but still failed');
                  exit;
                }
              }

              if (is_null($formhash)) {
                echo 'Error when getting form hash.';
              }

              // Second request to Post the comment
            //  $url_post = "http://bbs.tigtag.com/forum.php?mod=post&action=reply&fid=$fid&tid=$tid&extra=&replysubmit=yes";
              $url_post = "http://bbs.tigtag.com/forum.php?mod=post&action=reply&fid=$fid&tid=$tid&extra=&replysubmit=yes&infloat=yes&handlekey=fastpost&inajax=1";


              if (isset($alternative_message)) {
                $message = $alternative_message;
              } else {
                $message = $messages[array_rand($messages)];
              }
              $message = urlencode(iconv('UTF-8', 'GBK', $message));

              $data = "message=$message".( (isset($secanswer) && isset($sechash)) ? "&sechash=$sechash&secanswer=$secanswer" : '')."&posttime=$time&formhash=$formhash&usesig=1&subject=++";

              $crawler->setHeader(array(
                  'Referer: http://bbs.tigtag.com/thread-' . $tid . '-1-1.html',
              ));
            // die("\n\n" . $data . "\n\n");

              $html = $crawler->post($url_post, $data);

            //  _debug($html);
              if (strpos($html, 'succeedhandle_fastpost')) {

                if (strstr(iconv('GBK', 'UTF-8', $html), '审核')) {
                  $msg = 'Notice when doing post replay for user #' . $user->getId() . ' - ' . $user->getUsername() . ' == ' . iconv('GBK', 'UTF-8', $html);
                  $log = new Log('cron', Log::NOTICE, $msg);
                  $log->save();

                  echo "= Notice: Tigtag requires review.\n\n";
//                  sendemailAdmin('Dingtie: Notice - requires review', $msg);
                }

                echo "Success!\n";
                echo iconv('GBK', 'UTF-8', $html);
                echo "\n";

                $user->refreshRank();

              } else {
                $msg = 'Error when doing post reply. User is #' . $user->getId() . ' - ' . $user->getUsername() . ' == ' . (isset($secanswer) ? "<p>Secquestion: ".htmlentities($secquestion)."<br />Secanswer: $secanswer</p>" : "") . (iconv('GBK', 'UTF-8', $html) ? iconv('GBK', 'UTF-8', $html) : $html);
                $log = new Log('cron', Log::ERROR, $msg);
                $log->save();

                echo "Failed.. \n";
                echo (iconv('GBK', 'UTF-8', $html) ? iconv('GBK', 'UTF-8', $html) : $html);
                echo "\n";
//                sendemailAdmin('Dingtie: Error', $msg);
              }
            } else {
              $msg = 'Error when doing post reply. no valid user available';
              $log = new Log('cron', Log::ERROR, $msg);
              $log->save();

              echo "Error: no valid user available";
              echo "\n";
              sendemailAdmin('Dingtie: Error', $msg);
            }
}