<form wire:submit.prevent="save" class="w-full h-full px-5 py-3 box-border flex flex-col">
    <div class="form-component">
        <label for="product-name">Product Name</label>
        <input wire:model='name' type="text" />
    </div>
    <div class="form-component">
        <label for="product-name">Product Price</label>
        <input wire:model="price" type="number" />
    </div>
    <input type="submit" value="submit"/>
</form>
