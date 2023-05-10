
<div class="absolute inset-0 z-50 w-screen min-h-screen bg-gray-900/30"
    x-show="open"
    x-transition:enter="ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0">
    <div class="relative px-8 py-6 mx-auto bg-white rounded-lg shadow-md mt w-fit max-w-7xl top-36 drop-shadow shadow-gray-400/20"
        @click.outside="open = false">
        <!-- Header -->
        <div>
            <h2 class="text-4xl font-bold uppercase text-green-600 brightness-125">{{ $slot }}</h2>
        </div>
    </div>
</div>
