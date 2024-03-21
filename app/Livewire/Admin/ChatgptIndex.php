<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use OpenAI;

class ChatgptIndex extends Component
{
    public $askText;
    public $response;


    public function render()
    {
        return view('livewire.admin.chatgpt-index');
    }
    public function submit()
    {
        $client = OpenAI::client(env("OPENAI_API_KEY"));

        $response = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $this->askText],
            ],
        ]);
        $this->response = $response->choices[0]->message->content;
    }
}
