<div>
    <section class="page-section">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">Let's Get In Touch!</h2>
                    <hr class="divider" />
                    <p class="text-muted mb-5">Ready to start your next project with us? Send us a message and we will get back to you as soon as possible!</p>
                </div>
            </div>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
                    <form wire:submit.prevent="submit">
                        <div class="form-group mb-3">
                            <label for="name">Full name</label>
                            <input class="form-control" id="name" type="text" placeholder="Enter your name" wire:model="name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email address</label>
                            <input class="form-control" id="email" type="email" placeholder="name@gmail.com" wire:model="email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" wire:model="message"></textarea>
                            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn btn-xl btn-success btn-block">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>