<?php

$dir = '/var/www/html';
require ($dir . '/src/XF.php');
XF::start($dir);

\XF::app()->db()->beginTransaction();

$group = \XF::em()->create('XF:UserGroup');
$group->title = 'Premium Members';
$group->banner_css_class = 'userBanner userBanner--orange';
$group->banner_text = 'Premium';
$group->display_style_priority = 500;
$group->save();

$users = [
    [ 'username' => 'WilmaCargo', 'groups' => [$group->user_group_id] ],
    [ 'username' => 'MilesBehind', 'groups' => [$group->user_group_id] ],
    [ 'username' => 'GloriaSlap', 'groups' => [$group->user_group_id] ],
    [ 'username' => 'PercyVeer', 'groups' => [$group->user_group_id] ],
    [ 'username' => 'WillySwerve', 'groups' => [] ],
    [ 'username' => 'RolandSlide', 'groups' => [] ],
];

$userRepo = \XF::app()->repository('XF:User');

# took hints for this from XF/Install/Helpler:createInitialUser()

foreach ($users AS $u) {
    $user = $userRepo->setupBaseUser();
    $user->username = $u['username'];
    $user->email = strtolower($u['username']) .'@example.com';
    $user->set('secondary_group_ids',$u['groups']);
    $auth = $user->getRelationOrDefault('Auth');
    $auth->setPassword('overtake');
    $user->save();
}

\XF::app()->db()->commit();


