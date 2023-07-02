<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php foreach ($todo as $item): ?>
            <div>
                <?= $item['id']; ?> - <a href="<?= route('todo.show', ['todo' => $item['id']]); ?>"
                                         class="text-sky-500 hover:underline"><?= $item['title']; ?></a>
            </div>
        <? endforeach; ?>
        <div class="mt-5">
            <a href="<?= route('todo.create'); ?>"
               class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-1 px-3 rounded-full">New TODO</a>
        </div>
    </div>
</main>