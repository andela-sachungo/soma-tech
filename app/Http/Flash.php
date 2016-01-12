<?php

namespace Soma\Http;

class Flash
{
    /**
     * Create a flash message.
     *
     * @param  string  $title
     * @param  string  $message
     * @param  string  $key
     * @return void
     */
    public function createFlash($title, $message, $type, $key = 'flash_message')
    {
        // Flash is HTTP specific hence no need to inject the Session::store()
        session()->flash($key, [
                'title' => $title,
                'message' => $message,
                'type' => $type,
        ]);
    }

    /**
     * Create an info  flash message.
     *
     * @param  string  $title
     * @param  string  $message
     * @return void
     */
    public function info($title, $message)
    {
        return $this->createFlash($title, $message, 'info');
    }

    /**
     * Create a success flash message.
     *
     * @param  string  $title
     * @param  string  $message
     * @return void
     */
    public function success($title, $message)
    {
        return $this->createFlash($title, $message, 'success');
    }

    /**
     * Create an error  flash message.
     *
     * @param  string  $title
     * @param  string  $message
     * @return void
     */
    public function error($title, $message)
    {
        return $this->createFlash($title, $message, 'error');
    }
}
