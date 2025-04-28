<div class="flex flex-col gap-6">
    <form wire:submit.prevent="register" class="flex flex-col gap-6">
        <!-- Password -->
        <div class="form-component">
            <label for="name">Name</label>
            <input
                wire:model="name"
                type="text"
                required
                autofocus
                autocomplete="name"
                placeholder="John Doe"
                id="name"
            />
        </div>


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
                id="password"
            />
        </div>

        <input type="submit" value="Login" />

        <div>
            <span>Already have an account? </span><a href="{{route('login')}}">Login</a>
        </div>
    </form>

</div>
