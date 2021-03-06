<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

trait HandlesDefaultAndOldValue
{
    use HandlesBoundValues;

    private function setValue(
        string $name,
        $bind = null,
        $default = null,
        $language = null
    ) {
        if (!$language) {
            $default = $this->getBoundValue($bind, $name) ?: $default;

            return $this->value = old($name, $default);
        }

        $bind = $this->getBoundTarget($bind, $name);

        $default = $bind->getTranslation($name, $language, false) ?: $default;

        $this->value = old("{$name}.{$language}", $default);
    }
}
