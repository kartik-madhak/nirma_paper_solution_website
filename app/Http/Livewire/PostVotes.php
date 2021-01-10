<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Vote;
use App\Models\Post;

class PostVotes extends Component
{
    public $question_number;
    public $votes_sum;
    public $voted=false;
    public function mount($question_number,$votes_sum)
    {
        $this->question_number=$question_number;
        $this->votes_sum=$votes_sum;
    }
    public function render()
    {
        return view('livewire.post-votes');
    }
    public function vote($vote)
    {
        if(auth()->user()->votes()->where('question_number',$this->question_number)->count()>0)
        {
                $this->voted=false;
                return;
        }
        Vote::create(['question_number'=>$this->question_number,
                      'user_id'=>auth()->id(),
                      'vote'=>$vote


                      ]);
        
        Post::find($this->question_number)->increment('votes_sum',$vote);
        $this->votes_sum+=$vote;

    } 
}
