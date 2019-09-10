<?php

return [
  ""          => "home/index",
  "page404"   => "home/pageNotFound",

  "profile"   => "user/view",
  "profile/edit"      => "user/edit",
  "login"     => "user/login",
  "logout"    => "user/logout",
  "register"  => "user/register",

  "accounts" => "account/list",
  "account/new" => "account/create",
  "account/edit/([0-9]+)" => "account/edit/$1",
  "account/submit" => "account/submit",
  "account/delete/([0-9]+)" => "account/delete/$1",
  "account/delete/([0-9]+)/submit" => "account/delete/$1/submit",

];
