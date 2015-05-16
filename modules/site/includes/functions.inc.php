<?php
/**
 * Function to make a unique username
 */
function make_username() {
  load_library_fake_master();
  $faker = Faker\Factory::create();
  $firstname = strtolower($faker->firstName());
  $lastername = array('wong', 'li', 'chen', 'cheng', 'zhang', 'yao', 'zhao', 'qian', 'sun', 'liu', 'yang', 'wu', 'zhou', 'jing', 'zhen', 'su', 'xue', 'dong', 'pan', 'yu', 'mao', 'lv', 'xu', 'feng', 'zhong', 'qian', 'wan');
  $idx = array_rand($lastername);
  $lastername = $lastername[$idx];
  return $faker->numerify("$firstname$lastername###");
}

/**
 * Function to make an email
 */
function make_email($base) {
  if (!preg_match('/.+@.+/i', $base)) {
    throw new Exception('Email base name needs to be valid');
  }

  $tokens = explode('@', $base);
  $chars = str_split($tokens[0]);
  $length = sizeof($chars);

  $rtn = '';
  $occurence = array();
  $insert_poses = array();

  for ($i = 0; $i < rand(1, $length); $i++) {
    $insert_pos = rand(0, $length - 1);
    if (in_array($insert_pos, $occurence)) {
      continue;
    } else {
      $occurence[] = $insert_pos;
      $insert_poses[] = $insert_pos;
    }
  }

  for ($i = 0; $i < $length; $i++) {
    $rtn .= $chars[$i];
    if (in_array($i, $insert_poses)) {
      $rtn .= '.';
    }
  }

  return $rtn . '@' . $tokens[1];
}

/**
 * Function to load Fake master lib
 */
function load_library_fake_master() {
  require_once MODULESROOT . DS . 'site' . DS . 'includes' . DS . 'libraries' . DS . 'Faker-master' . DS . 'src' . DS . 'autoload.php';
}