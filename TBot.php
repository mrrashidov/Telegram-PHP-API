<?php
/***
 *Created by: u2b3ki
 *Mail: u2b3ki@gmail.com
 *Date: 2020-01-13
 *Time: 23:23
 ***/

/***
 * Class TBot
 ***/
class TBot
{
    const  API_URL = 'https://api.telegram.org/bot';
    public $token;
    public $chatId;

    /**
     * @param $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @param $url
     * @return bool|string
     */
    public function setWebhook($url)
    {
        return $this->request('setWebhook', [
            'url' => $url
        ]);
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        $data = json_decode(file_get_contents('php://input'));
        $this->chatId = $data->message->chat->id;
        return $data->message;
    }

    /**
     * @param $method
     * @param $posts
     * @return bool|string
     */
    public function request($method, $posts)
    {
        $ch = curl_init();
        $url = self::API_URL . $this->token . '/' . $method;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($posts));
        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }

    /**
     * @param $message
     * @return bool|string
     */
    public function sendMessage($message)
    {
        return $this->request('sendMessage', [
            'chat_id' => $this->chatId,
            'text' => $message
        ]);
    }

    /**
     * @param $url
     * @param string $caption
     * @return bool|string
     */
    public function sendPhoto($url, $caption = '')
    {
        return $this->request('sendPhoto', [
            'chat_id' => $this->chatId,
            'photo' => $url,
            'caption' => $caption
        ]);
    }

    public function sendVoice()
    {

    }
}


