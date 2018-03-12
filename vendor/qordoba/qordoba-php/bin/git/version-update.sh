#!/usr/bin/php
<?php

  // Searching for composer.json
  $ProjectPathChunks = [];
  $ProjectJSONFile = "";
  $ProjectPath = dirname(__FILE__);

  while(strlen($ProjectPath) > 0) {
    $ProjectPathChunks = explode("/", $ProjectPath);
    array_pop($ProjectPathChunks);
    $ProjectPath = implode("/", $ProjectPathChunks);

    if(count(glob($ProjectPath . "/composer.json")) > 0) {
      $ProjectJSONFile = $ProjectPath . "/composer.json";
      break;
    }
  }

  if(strlen($ProjectJSONFile) == 0) {
    throw new Exception("Project JSON file composer.json not found");
  }

  $ComposerJSONFileContents = file_get_contents($ProjectJSONFile);
  if(!$ComposerJSONFileContents) {
    throw new Exception("Error reading: " . $ProjectJSONFile);
  }


  $ComposerJSON = json_decode($ComposerJSONFileContents);

  if(!isset($ComposerJSON->version)) {
    throw new Exception("Version tag not found: " . $ProjectJSONFile);
  }


  $versionTagChunks = explode(".", $ComposerJSON->version);
  if(!is_numeric($versionTagChunks[count($versionTagChunks)-1])) {
    throw new Exception("Named version?: " . $ProjectJSONFile);
  }

  $versionTagChunks[count($versionTagChunks)-1] =
    $versionTagChunks[count($versionTagChunks)-1] + 1;

  $ComposerJSON->version = implode(".", $versionTagChunks);

  if(!file_put_contents($ProjectJSONFile, json_encode($ComposerJSON, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES))) {
    throw new Exception("File is not writable: " . $ProjectJSONFile);
  }

  shell_exec("git add " . $ProjectJSONFile);
  exit(0);


