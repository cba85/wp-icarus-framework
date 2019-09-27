<div class="notice <?= $class ?> is-dismissible">
    <p><?= __($message, 'wp-icarus'); ?></p>
    <?php if (isset($button)) : ?>
        <p>
            <a class="button button-primary" href="<?= $button['href'] ?>"><?= $button['text'] ?></a>
        </p>
    <?php endif ?>
</div>
