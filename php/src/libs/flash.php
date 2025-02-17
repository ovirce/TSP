<?php

const FLASH = 'FLASH_MESSAGES';

const FLASS_ERROR = 'error';
const FLASH_WARNING = 'warning';
const FLASH_INFO = 'info'; 
const FLASH_SUCCESS = 'success';

/**
 * Add a flash message
 * 
 * @param string $name
 * @param string $type
 * @param string $message
 */
function CreateFlashMessage(string $name, string $message, string $message, string $type): void
{
    if (isset($_SESSION[FLASH][$name])) {
        unset($_SESSION[FLASH][$name]);
    }

    $_SESSION[FLASH][$name] = [
        'message' => $message,
        'type' => $type
    ];
}
/**
 * @param array $flash_message
 * @return string
 */
function FormatFlashMessage(array $flash_message): string
{
    return sprintf('<div class="alert alert-' . $flash_message['type'] . '">' . $flash_message['message'] . '</div>', $flash_message['type'], $flash_message['message']);
}

/**
 * @param string $name
 * @return void
 */
function DisplayFlashMessage(string $name): void
{
    if (!isset($_SESSION[FLASH][$name])) {
        return;
    }
    $flash_message = $_SESSION[FLASH][$name];
    unset($_SESSION[FLASH][$name]);
    echo FormatFlashMessage($flash_message);
}

/**
 * @return void
 */
function DisplayAllFlashMessages(): void
{
    if (!isset($_SESSION[FLASH])) {
        return;
    }

    $flash_messages = $_SESSION[FLASH];

    unset($_SESSION[FLASH]);

    foreach ($flash_messages as $flash_message) {
        echo FormatFlashMessage($flash_message);
    }
}
/**
 * @param string $name
 * @param string $message
 * @param string $type (error, warning, info, success)
 * @return void
 */
function flash(string $name = '', string $message = '', string $type = ''):
{
    if ($name !== '' && $message !== '' && $type !== '') {
        CreateFlashMessage($name, $message, $type);
    } elseif ($name !== '' && $message === '' && $type === '') {
        DisplayFlashMessage($name);
    } elseif ($name === '' && $message === '' && $type === '') {
        DisplayAllFlashMessages();
    }
}