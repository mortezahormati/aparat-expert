<?php

namespace Framework;

class Session
{

    /**start_session
     *
     * @return  void
     */
    public static function start(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**set_session
     * @param string $key
     * @param  $value
     * @return  void
     */

    public static function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**get_session
     * @param string $key
     * @param  $default
     * @return  mixed
     */
    public static function get(string $key, $default = null)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    /**has ? session
     * @param string $key
     * @return bool
     */

    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    /**clear session by key
     * @param string $key
     * @return void
     */
    public static function clear(string $key):void
    {
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }

    /**clearAll session
     * @return void
     */
    public static function clearAll():void
    {
        session_unset();
        session_destroy();
    }


}