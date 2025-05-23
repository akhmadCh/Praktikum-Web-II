<div class="navbar bg-base-100 shadow-md px-8">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl" href="/">Home</a>
    </div>
    <div class="flex gap-2">
        <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
            <img
                alt="Tailwind CSS Navbar component"
                src="<?= base_url('image/profile.jpg') ?>" />
            </div>
        </div>
        <ul
            tabindex="0"
            class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
            <li>
            <a class="justify-between" href="../pages/about">
                Profile
            </a>
            </li>
        </ul>
        </div>
    </div>
</div>