<?php


namespace GB;


class Exchange
{
    use Log;
    public  $server   = '';
    public  $port     = '';
    public  $password = '';
    public  $user     = '';
    private $connection;

    public function __construct()
    {
    }

    public function exe(string $comand)
    {
        if ($this->checkConnect()) {
            return \ssh2_exec($this->connection, $comand);
        } else {
            return false;
        }
    }

    /**
     * Соединение с другим сервером
     * @return bool
     */
    private function checkConnect(): bool
    {
        if (empty($this->user)
            || empty($this->password)
            || empty($this->server)
            || empty($this->port)
        ) {
            $this->setError('Парметры для соединения не валидные');
            return false;
        }

        if (empty($this->connection)) {
            $this->connection = \ssh2_connect($this->server, $this->port);
            if ($this->connection === false) {
                $this->setError('Не удалось подключиться к серверу');
                return false;
            }
            if (\ssh2_auth_password($this->connection, $this->user, $this->password)) {
                $this->setError('Не верный логин или пароль для подключения к серверу');
                return false;
            }
        }

        return true;
    }
}