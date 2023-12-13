<?php

function language_list(...$list_items): array
{
    return $list_items;
}

function add_to_language_list($language_list, $new_item): array
{
    $language_list[] = $new_item;
    return $language_list;
}

function prune_language_list($language_list): array
{
    return array_splice($language_list, 1);
}

function current_language($language_list): string
{
    return $language_list[0];
}

function language_list_length($language_list): int
{
    return count($language_list);
}

