<?php

echo <<<EO_CREATE_TABLE
CREATE TABLE `user` (
  `id` mediumint(9) NOT NULL auto_increment,
  `name` varchar(20) default NULL,
  `age` tinyint(3) unsigned default NULL,
  `sex` enum('MALE','FEMALE') default NULL,
  PRIMARY KEY  (`id`),
  KEY `age_sex` (`age`,`sex`),
  KEY `sex_age` (`sex`,`age`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


EO_CREATE_TABLE;

$sexes = array('MALE','FEMALE');

foreach (range(1,100) as $age) {

    $rows = array();

    $records = round(rand(1,100));
    for ($i=1; $i<=$records; $i++) {
        $sex = $sexes[ array_rand($sexes) ];
        $rows[] = '("'. md5(rand()) .'",'. $age .',"'. $sex .'")';
    }

    echo "INSERT INTO user (name, age, sex) VALUES ". implode(", ", $rows) .";\n\n";
}
    
    
    
