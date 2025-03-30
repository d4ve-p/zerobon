<div class="flex flex-col gap-6">
    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Email Address -->
        <div class="form-component">
            <label for="email">Email</label>
            <input
                wire:model="email"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@example.com"
                id="email"
            />
        </div>


        <!-- Password -->
        <div class="form-component">
            <label for="password">Password</label>
            <input
                wire:model="password"
                type="password"
                required
                autocomplete="current-password"
                placeholder="password"
                id="password"
            />
        </div>

        <input type="submit" value="Login" />

        <div>
            <span>Don't have an account? </span><a href="{{route('register')}}">Register</a>
        </div>
    </form>

</div>
