<?php
/**
 * State
 * The State design pattern is a behavioral pattern 
 * that allows an object to change its behavior when 
 * its internal state changes. The object will appear 
 * to change its class, even though it does not.
 */

interface DocumentState {
    public function edit(Documents $document) : void;
    public function publish(Documents $document) : void;
}

class Documents {
    private DocumentState $state;
    public function __construct(DocumentState $state)
    {
        $this->transitionTo($state);
    }

    public function transitionTo(DocumentState $state) : void
    {
        $this->state = $state;
    }

    public function edit() : void
    {
        $this->state->edit($this);
    }

    public function publish() : void
    {
        $this->state->publish($this);
    }
}

class DraftState implements DocumentState {
    public function edit(Documents $document): void
    {
        echo "Editing in Draft State,<br>" . PHP_EOL;
    }

    public function publish(Documents $document): void
    {
        echo "Draft state trasision to ReviewState<br>" . PHP_EOL;
        $document->transitionTo(new ReviewState());
    }
}

class ReviewState implements DocumentState {
    public function edit(Documents $document): void
    {
        echo "Editing In Reviewing State<br>" . PHP_EOL;
    }

    public function publish(Documents $document): void
    {
        echo "Review state trasition to PublishState<br>" . PHP_EOL;
        $document->transitionTo(new PublishState());
    }
}

class PublishState implements DocumentState {
    public function edit(Documents $document): void
    {
        echo "Cannot edit<br>" . PHP_EOL;
    }

    public function publish(Documents $document): void
    {
        echo "Already Published!<br>" . PHP_EOL;
    }
}