<?php
extract($_);
$downloadsList = [
    ["name" => "active", "label" => "Active Downloads", "id" => "active-downloads", "path" => "/apps/ncdownloader/status/active"],
    ["name" => "waiting", "label" => "Waiting Downloads", "id" => "waiting-downloads", "path" => "/apps/ncdownloader/status/waiting"],
    ["name" => "fail", "label" => "Failed Downloads", "id" => "failed-downloads", "path" => "/apps/ncdownloader/status/fail"],
    ["name" => "complete", "label" => "Complete Downloads", "id" => "complete-downloads", "path" => "/apps/ncdownloader/status/complete"],
    ["name" => "youtube-dl", "label" => "Youtube-dl Downloads", "id" => "youtube-dl-downloads", "path" => "/apps/ncdownloader/youtube/get"],
];
?>
<div id="app-navigation">
    <?php if (!$ncd_hide_errors): ?>
        <?php foreach ($errors as $error): ?>
            <div data-error-message="<?php print $l->t($error);?>"></div>
        <?php endforeach;?>
    <?php endif;?>

    <div class="app-navigation-new" id="search-download"  data-inputbox="form-input-wrapper">
        <button type="button" class="icon-add">
            <?php print($l->t('Download & Search'));?>
        </button>
    </div>
    <?php if ($is_admin): ?>
    <div class="app-navigation-new" id="start-aria2">
        <?php if ($aria2_installed && $aria2_executable): ?>
        <button type="button" class="icon-power"
            data-aria2="<?php $aria2_running ? print $l->t('on') : print $l->t('off');?>">
            <?php $aria2_running ? print $l->t('Stop Aria2') : print $l->t('Start Aria2');?>
        </button>
    </button>
        <?php elseif ($aria2_installed && !$aria2_executable): ?>
        <button type="button" class="icon-power notinstalled" >
            <?php print $l->t("aria2c is installed but not executable");?>
        </button>
        <?php else: ?>
        <button type="button" class="icon-power notinstalled">
            <?php print $l->t("aria2c is not installed!");?>
        </button>
        <?php endif;?>
    </div>
    <?php endif;?>
    <ul>
        <?php foreach ($downloadsList as $value): ?>
        <li class="download-queue <?php print $value["id"];?>">
            <div class="app-navigation-entry-bullet"></div>
            <a  role="button" tabindex="0" path="<?php print $value["path"];?>"  id="<?php print $value["id"];?>">
                <?php print($l->t($value["label"]));?>
            </a>
            <div class="app-navigation-entry-utils">
                <ul>
                    <li class="app-navigation-entry-utils-counter" id="<?php print $value["name"] . "-downloads-counter";?>">
                        <div class="number"><?php print($_['counter'][$value["name"]]);?></div>
                    </li>
                </ul>
            </div>
        </li>
     <?php endforeach;?>
    </ul>
    <div id="app-settings">
      <div id="app-settings-header">
        <button
          name="app settings"
          class="settings-button"
          data-apps-slide-toggle="#app-settings-content"
        >
        <?php p($l->t('Settings'));?>
        </button>
      </div>
      <div id="app-settings-content" ></div>
    </div>
</div>