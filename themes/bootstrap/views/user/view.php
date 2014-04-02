<div class="user">
    <h2>
        <?php echo $user->login; ?>
    </h2>
    <h4>
        <?php echo $user->name; ?>
    </h4>
    <div class="date">
        <?php echo Yii::t("app", "registered"); ?>:
        <?php echo $user->creation_date; ?>
    </div>
</div>