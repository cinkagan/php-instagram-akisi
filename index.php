<?php
function baglan($a)
{

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $a);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $isle = curl_exec($ch);
    curl_close($ch);
    return $isle;
}

$userId = "";
$accessToken = "";
$resimler = baglan('https://api.instagram.com/v1/users/' . $userId . '/media/recent/?access_token=' . $accessToken);

?>


<ul>
    <?php foreach (json_decode($resimler)->data as $key) {  ?>
        <li>
            <a href="<?php echo $key->images->standard_resolution->url ?>">
                <img src="<?php echo $key->images->low_resolution->url ?>" alt="instagram">
            </a>
        </li>
    <?php } ?>
</ul>