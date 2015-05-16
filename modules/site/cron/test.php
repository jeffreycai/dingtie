<?php
require_once __DIR__ . '/../../../bootstrap.php';

sendemailAdmin('Test sent on 1 11', 'Crontab is:<br /> 1 11 * * *               php /home/pdrupal/webs/dingtie/modules/site/cron/test.php');
