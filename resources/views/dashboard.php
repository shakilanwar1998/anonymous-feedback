<?php include 'includes/header.php' ?>

<div class="relative flex min-h-screen overflow-hidden bg-gray-50 py-6 sm:py-12">
    <img src="../images/beams.jpg" alt="" class="absolute top-1/2 left-1/2 max-w-none -translate-x-1/2 -translate-y-1/2" width="1308" />
    <div class="absolute inset-0 bg-[url(./images/grid.svg)] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>

    <div class="relative max-w-7xl mx-auto">
        <div class="flex justify-end">
            <span class="block text-gray-600 font-mono border border-gray-400 rounded-xl px-2 py-1">Your feedback form link: <strong><?php echo $_SERVER['HTTP_HOST'].'/feedback/'.$data['user']['slug'] ?></strong></span>
        </div>
        <h1 class="text-xl text-indigo-800 text-bold my-10">Received feedback</h1>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

            <?php foreach($data['feedbacks'] as $feedback): ?>
            <div class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400">
                <div class="focus:outline-none">
                    <p class="text-gray-500"><?php echo $feedback['feedback'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>

</div>

<?php include 'includes/footer.php'?>
