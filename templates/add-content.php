 <nav class="nav">
      <ul class="nav__list container">
      <?php foreach ($categories as $category): ?>
        <li class="nav__item">
          <a href="all-lots.html"><?= $category['name']; ?></a>
        </li>
      <?php endforeach; ?>
      </ul>
    </nav>
    <form class="form form--add-lot container <?php if ($errors) echo ('form--invalid') ?>" action="add.php" method="post">
      <h2>Добавление лота</h2>
      <div class="form__container-two">
        <div class="form__item <?php if ($errors['lot-name']) echo ('form__item--invalid') ?>">
          <label for="lot-name">Наименование <sup>*</sup></label>
          <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?= getPostVal('lot-name'); ?>">
          <?php if ($errors): ?>
            <span class="form__error"><?= $errors['lot-name'] ?></span>
          <?php endif; ?>
        </div>
        <div class="form__item <?php if ($errors['category']) echo ('form__item--invalid') ?>">
          <label for="category">Категория <sup>*</sup></label>
          <select id="category" name="category">
            <option>Выберите категорию</option>
            <?php foreach ($categories as $category): ?>
                <option><?= $category['name']; ?></option>
            <?php endforeach; ?>
          </select>
          <span class="form__error"><?= $errors['category'] ?></span>
        </div>
      </div>
      <div class="form__item form__item--wide <?php if ($errors['message']) echo ('form__item--invalid') ?>">
        <label for="message">Описание <sup>*</sup></label>
        <textarea id="message" name="message" placeholder="Напишите описание лота"><?= getPostVal('message'); ?></textarea>
        <span class="form__error"><?= $errors['message'] ?></span>
      </div>
      <div class="form__item form__item--file <?php if ($errors) echo ('form__item--invalid') ?>">
        <label>Изображение <sup>*</sup></label>
        <div class="form__input-file">
          <input class="visually-hidden" type="file" id="lot-img" value="">
          <label for="lot-img">
            Добавить
          </label>
        </div>
      </div>
      <div class="form__container-three">
        <div class="form__item form__item--small <?php if ($errors['lot-rate']) echo ('form__item--invalid') ?>">
          <label for="lot-rate">Начальная цена <sup>*</sup></label>
          <input id="lot-rate" type="text" name="lot-rate" placeholder="0" value="<?= getPostVal('lot-rate'); ?>">
          <span class="form__error"><?= $errors['lot-rate'] ?></span>
        </div>
        <div class="form__item form__item--small <?php if ($errors['lot-step']) echo ('form__item--invalid') ?>">
          <label for="lot-step">Шаг ставки <sup>*</sup></label>
          <input id="lot-step" type="text" name="lot-step" placeholder="0" value="<?= getPostVal('lot-step'); ?>">
          <span class="form__error"><?= $errors['lot-step'] ?></span>
        </div>
        <div class="form__item <?php if ($errors['lot-date']) echo ('form__item--invalid') ?>">
          <label for="lot-date">Дата окончания торгов <sup>*</sup></label>
          <input class="form__input-date" id="lot-date" type="text" name="lot-date" placeholder="Введите дату в формате ГГГГ-ММ-ДД" <?= getPostVal('lot-date'); ?>>
          <span class="form__error"><?= $errors['lot-date'] ?></span>
        </div>
      </div>
      <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
      <button type="submit" class="button">Добавить лот</button>
    </form>
