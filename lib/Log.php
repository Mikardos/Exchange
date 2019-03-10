<?php


namespace GB;


trait Log
{
    static $arErrors = [];
    static $arSuccess = [];
    static $arWarnings = [];
    static $arNotes = [];

    public function setError($error) {
        if (!empty($error)) {
            if (is_array($error)) {
                self::$arErrors = array_merge(self::$arErrors, $error);
            } else {
                self::$arErrors[] = $error;
            }
        }
    }
    public function setSuccess($text) {
        if (!empty($text)) {
            if (is_array($text)) {
                self::$arSuccess = array_merge(self::$arSuccess, $text);
            } else {
                self::$arSuccess[] = $text;
            }
        }
    }
    public function setWarning($text) {
        if (!empty($text)) {
            if (is_array($text)) {
                self::$arWarnings = array_merge(self::$arWarnings, $text);
            } else {
                self::$arWarnings[] = $text;
            }
        }
    }
    public function setNote($text) {
        if (!empty($text)) {
            if (is_array($text)) {
                self::$arNotes = array_merge(self::$arNotes, $text);
            } else {
                self::$arNotes[] = $text;
            }
        }
    }

    public function clearSucces() {
        self::$arSuccess = [];
    }
    public function clearErrors() {
        self::$arErrors = [];
    }
    public function clearWarnings() {
        self::$arWarnings = [];
    }
    public function clearNotes() {
        self::$arNotes = [];
    }

    public function getWarnings() {
        return self::$arWarnings;
    }
    public function getErrors() {
        return self::$arErrors;
    }
    public function getSuccess() {
        return self::$arSuccess;
    }
    public function getNotes() {
        return self::$arNotes;
    }

    public function printErrors() {
        if (empty($this->getErrors())) return;
        echo '<div style="color: #f00; margin-bottom: 10px;">';
        foreach ($this->getErrors() as $error) {
            echo "{$error}<br>".PHP_EOL;
        }
        echo '</div>';
    }
    public function printSuccess() {
        if (empty($this->getSuccess())) return;
        echo '<div style="color: #0f9d58; margin: 9px 0 10px;">';
        foreach ($this->getSuccess() as $success) {
            echo "{$success}<br>".PHP_EOL;
        }
        echo '</div>';
    }
    public function printNotes() {
        if (empty($this->getNotes())) return;
        echo '<div style="margin: 9px 0 10px;">';
        foreach ($this->getNotes() as $node) {
            echo "{$node}<br>".PHP_EOL;
        }
        echo '</div>';
    }
    public function printWarnings() {
        if (empty($this->getWarnings())) return;
        echo '<div style="color: #97ba00;">';
        foreach ($this->getWarnings() as $text) {
            echo "{$text}<br>".PHP_EOL;
        }
        echo '</div>';
    }
}