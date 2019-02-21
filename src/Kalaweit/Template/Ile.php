
<select name="island" class="form-control">
    <?php
    foreach ($this->islands as $key => $island) {
        echo '<option value="' . $island->getId() . '">' . $island->getName() . '</option>';
    }
    ?>
</select>
