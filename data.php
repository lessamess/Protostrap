<?php $yaml = <<<EOD

events:
  0:
    id: balloon
    title: Bendy Giraffe
    subtitle: Annual Balloon Artist Convention
    date: September 23.-25.
    city: Atlanta, Georgia
  1:
    id: games
    title: Pokerface
    subtitle: The Coneference for Gamblers and Players
    date: October 23.-25.
    city: Paris, France

users:
  user:
    username: Otto One
    usermail: one@company.com
    role: user
  admin:
    username: Tommy Two
    usermail: two@company.com
    role: admin
  admin2:
    username: Theodor Three
    usermail: three@company.com
    role: admin

EOD;
// Leave the code below alone

$parsed = Spyc::YAMLLoad($yaml);

foreach ($parsed as $key => $item){
    $$key = $item;
}