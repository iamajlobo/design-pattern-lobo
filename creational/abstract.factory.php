<?php
/*
* Abstract Factory Create families of related objects 
* without specifying their concrete classes.
*/

interface Button {
    public function render() : void;
}

interface Checkbox {
    public function render() : void;
}

class DarkButton implements Button {
    public function render(): void
    {
        echo 'I am Dark Button';
    }
}

class DarkCheckbox implements Checkbox {
    public function render(): void
    {
        echo 'I am Dark Checkbox';
    }
}

class LightButton implements Button {
    public function render(): void
    {
        echo 'I am Light Button';
    }
}

class LightCheckbox implements Checkbox {
    public function render(): void
    {
        echo 'I am Light Checkbox';
    }
}

interface UIFactory {
    public function createButton() : Button;
    public function createCheckbox() : Checkbox;
}

class DarkUIFactory implements UIFactory {
    public function createButton(): Button
    {
        return new DarkButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new DarkCheckbox();
    }
}

class LightUIFactory implements UIFactory {
    public function createButton(): Button
    {
        return new LightButton();
    }

    public function createCheckbox(): Checkbox
    {
        return new LightCheckbox();
    }
}