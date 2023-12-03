<?php

class HighSchoolSweetheart
{
    public function firstLetter(string $name): string
    {
        return substr(trim($name), 0, 1);
    }

    public function initial(string $name): string
    {
        return ucfirst($this->firstLetter($name)) . '.';
    }

    public function initials(string $name): string
    {
        $name_strings = explode(' ', $name);
        return $this->initial($name_strings[0]) . ' ' . $this->initial($name_strings[1]);
    }

    public function pair(string $sweetheart_a, string $sweetheart_b): string
    {
        // Better formatting for heart string from user dstockto's solution
        $ini1 = $this->initials($sweetheart_a);
        $ini2 = $this->initials($sweetheart_b);
        return <<<HEART
                 ******       ******
               **      **   **      **
             **         ** **         **
            **            *            **
            **                         **
            **     $ini1  +  $ini2     **
             **                       **
               **                   **
                 **               **
                   **           **
                     **       **
                       **   **
                         ***
                          *
            HEART;
    }
}
