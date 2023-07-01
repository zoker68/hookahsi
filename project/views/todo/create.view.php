<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="<?= route('todo.store'); ?>" method="POST">
                <div>
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                        <input id="title" name="title" type="text" value="<?= old('title'); ?>"
                               required
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>

                    <?php if (error('title')) : ?>
                        <p class="text-sm text-red-500"><?= error('title'); ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Text</label>
                    <div class="mt-2">
                        <textarea id="description" name="description"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                  required><?= old('description'); ?></textarea>
                    </div>

                    <?php if (error('description')) : ?>
                        <p class="text-sm text-red-500"><?= error('description'); ?></p>
                    <?php endif; ?>
                </div>


                <div>
                    <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Add todo
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>