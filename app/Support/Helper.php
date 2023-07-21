<?php

use App\Constants\Common;

if (!function_exists('handleImage')) {
    function handleImage($fileImage): string
    {
        $imageName = "";

        if ($_FILES['image_url']['name']) {
            $image = $fileImage;
            $imageName = $image->getClientOriginalName();
            $image->move('images',  $imageName);
        }

        return $imageName;
    }
}

if (!function_exists('condition')) {
    function condition(array $conditions): array
    {
        foreach ($conditions as $key => $value) {
            if ($key == Common::UNSET_CONDITION || in_array($value[2], Common::UNSET)) {
                unset($conditions[$key]);
            }
        }
        return $conditions;
    }
}
