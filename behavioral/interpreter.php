<?php

/**
 * Interpreter
 * IT used if you want want to evaluate expression using rules or grammar
 */

interface Expression {
    public function interpret() : int;
}

class NumberExpression implements Expression {
    public function __construct(private int $number){}

    public function interpret(): int
    {
        return $this->number;
    }
}

class AddExpression implements Expression {
    public function __construct(private Expression $left,private Expression $right){}
    public function interpret(): int
    {
        return $this->left->interpret() + $this->right->interpret();
    }
}