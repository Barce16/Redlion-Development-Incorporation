<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Welcome Page Content') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Image stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-600 dark:text-gray-400 text-sm font-medium">Hero Images</div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-white mt-2">
                        {{ $heroImages->count() }}
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-600 dark:text-gray-400 text-sm font-medium">Featured Images</div>
                    <div class="text-3xl font-bold text-blue-600 mt-2">{{ $featuredImages->count() }}</div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-600 dark:text-gray-400 text-sm font-medium">Premium Images</div>
                    <div class="text-3xl font-bold text-purple-600 mt-2">{{ $premiumImages->count() }}</div>
                </div>
            </div>

            <!-- Info message -->
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-700 rounded-lg p-4 mb-8">
                <p class="text-sm text-blue-800 dark:text-blue-200">
                    💡 <strong>New features:</strong> Drag-and-drop reorder • Bulk upload • Image preview • Schedule publishing (coming soon)
                </p>
            </div>

            <!-- Legend -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-8 p-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Legend</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <p class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">⭐ Hero</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">Main image displayed in the welcome page hero section. Only one hero image per type.</p>
                        <a href="#" @click.prevent="$dispatch('open-modal', 'manage-hero')" class="mt-2 inline-block text-xs font-semibold text-white bg-red-500 hover:bg-red-600 rounded px-3 py-1">Manage Hero</a>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">💙 Featured</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">Carousel on welcome page. Add unlimited images and reorder them via drag-and-drop.</p>
                        <a href="#" @click.prevent="$dispatch('open-modal', 'manage-featured')" class="mt-2 inline-block text-xs font-semibold text-white bg-blue-500 hover:bg-blue-600 rounded px-3 py-1">Manage Featured</a>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">👑 Premium</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">Premium developments section. Unlimited images with custom ordering.</p>
                        <a href="#" @click.prevent="$dispatch('open-modal', 'manage-premium')" class="mt-2 inline-block text-xs font-semibold text-white bg-purple-500 hover:bg-purple-600 rounded px-3 py-1">Manage Premium</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Modal -->
    <x-modal name="manage-hero">
        <div class="p-6 max-h-[90vh] overflow-y-auto">
            <h3 class="text-lg font-semibold mb-2">Manage Hero Image</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Upload the hero image for the welcome page.</p>

            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mb-6">
                <h4 class="font-semibold text-sm mb-4 text-gray-900 dark:text-white">Upload Hero Image</h4>
                <form id="hero-form" class="space-y-4">
                    <input type="hidden" id="hero-edit-id" value="">

                    <!-- File Input with Drag-Drop -->
                    <div id="hero-dropzone" class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center cursor-pointer hover:border-red-500 transition" ondrop="handleDropZone(event, 'hero')" ondragover="event.preventDefault(); event.target.closest('#hero-dropzone')?.classList.add('border-red-500', 'bg-red-50')" ondragleave="event.target.closest('#hero-dropzone')?.classList.remove('border-red-500', 'bg-red-50')">
                        <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Drag and drop your image here</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">or</p>
                        <input type="file" id="hero-image" name="image" accept="image/*" class="hidden" onchange="previewImage(event, 'hero')">
                        <button type="button" onclick="document.getElementById('hero-image').click()" class="mt-2 text-sm text-red-600 hover:text-red-700 font-medium">Click to select</button>
                    </div>

                    <!-- Preview -->
                    <div id="hero-preview" style="display:none;">
                        <img id="hero-preview-img" src="" alt="Preview" class="max-w-full h-auto rounded-lg max-h-64 mx-auto">
                        <p id="hero-preview-name" class="text-xs text-gray-600 dark:text-gray-400 mt-2 text-center"></p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Caption (Optional)</label>
                        <textarea id="hero-desc" placeholder="Add a caption..." class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-800 dark:text-white text-sm" rows="2"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <input type="checkbox" id="hero-published" checked class="mr-2"> Publish Immediately
                        </label>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Schedule Publish (Optional)</label>
                        <input type="datetime-local" id="hero-schedule" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-800 dark:text-white text-sm">
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Leave empty to publish immediately</p>
                    </div>

                    <button type="button" onclick="uploadImage('hero')" class="w-full px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg font-semibold text-sm">Upload</button>
                </form>

                @if($heroImages->count())
                    <div class="mt-6">
                        <h4 class="font-semibold text-sm mb-3 text-gray-900 dark:text-white">Current Hero Image</h4>
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b">
                                    <th class="p-2 text-left">Preview</th>
                                    <th class="p-2 text-left">Caption</th>
                                    <th class="p-2 text-left">Status</th>
                                    <th class="p-2 text-center">Edit</th>
                                    <th class="p-2 text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($heroImages as $img)
                                    <tr class="border-b" data-caption="{{ $img->caption ?? '' }}" data-published="{{ $img->is_published ? 'true' : 'false' }}" data-schedule="{{ $img->scheduled_publish_at?->format('Y-m-d H:i') ?? '' }}">
                                        <td class="p-2"><img src="{{ asset('storage/' . $img->image_path) }}" class="h-10 w-16 object-cover rounded"></td>
                                        <td class="p-2">{{ $img->caption ?? '—' }}</td>
                                        <td class="p-2">
                                            @if(!$img->is_published)
                                                <span class="text-xs px-2 py-1 bg-yellow-100 text-yellow-800 rounded">Draft</span>
                                            @elseif($img->scheduled_publish_at?->isFuture())
                                                <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded">Scheduled</span>
                                            @else
                                                <span class="text-xs px-2 py-1 bg-green-100 text-green-800 rounded">Published</span>
                                            @endif
                                        </td>
                                        <td class="p-2 text-center"><button type="button" onclick="startEdit('hero', this.closest('tr'))" class="text-blue-600 hover:underline">Edit</button></td>
                                        <td class="p-2 text-center"><button type="button" onclick="deleteImage({{ $img->id }})" class="text-red-600 hover:underline">Delete</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </x-modal>

    <!-- Featured Modal -->
    <x-modal name="manage-featured">
        <div class="p-6 max-h-[90vh] overflow-y-auto">
            <h3 class="text-lg font-semibold mb-2">Manage Featured Images</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Upload featured carousel images. Drag rows to reorder.</p>

            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mb-6">
                <h4 class="font-semibold text-sm mb-4 text-gray-900 dark:text-white">Upload Featured Images</h4>
                <form id="featured-form" class="space-y-4">
                    <input type="hidden" id="featured-edit-id" value="">

                    <!-- Drag-drop zone -->
                    <div id="featured-dropzone" class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center cursor-pointer hover:border-blue-500 transition" ondrop="handleDropZone(event, 'featured')" ondragover="event.preventDefault(); event.target.closest('#featured-dropzone')?.classList.add('border-blue-500', 'bg-blue-50')" ondragleave="event.target.closest('#featured-dropzone')?.classList.remove('border-blue-500', 'bg-blue-50')">
                        <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Drag images here or click to select</p>
                        <input type="file" id="featured-images" name="images" accept="image/*" multiple class="hidden" onchange="previewBulkImages(event, 'featured')">
                        <button type="button" onclick="document.getElementById('featured-images').click()" class="mt-2 text-sm text-blue-600 hover:text-blue-700 font-medium">Select Multiple Files</button>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Up to 20 images, up to 2MB each</p>
                    </div>

                    <!-- Bulk preview grid -->
                    <div id="featured-preview-grid" class="grid grid-cols-3 gap-4" style="display:none;"></div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Caption (for single edit)</label>
                        <textarea id="featured-desc" placeholder="Add a caption..." class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-800 dark:text-white text-sm" rows="2"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <input type="checkbox" id="featured-published" checked class="mr-2"> Publish Immediately
                        </label>
                    </div>

                    <button type="button" onclick="uploadImage('featured')" class="w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg font-semibold text-sm">Upload</button>
                </form>

                @if($featuredImages->count())
                    <div class="mt-6">
                        <h4 class="font-semibold text-sm mb-3 text-gray-900 dark:text-white">Current Featured Images (Drag to Reorder)</h4>
                        <table id="featured-table" class="w-full text-sm">
                            <thead>
                                <tr class="border-b">
                                    <th class="p-2 w-8">↕️</th>
                                    <th class="p-2 text-left">Preview</th>
                                    <th class="p-2 text-left">Caption</th>
                                    <th class="p-2 text-left">Status</th>
                                    <th class="p-2 text-center">Edit</th>
                                    <th class="p-2 text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody id="featured-tbody">
                                @foreach($featuredImages as $img)
                                    <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-600 cursor-move" draggable="true" ondragstart="handleDragStart(event)" ondragover="handleDragOver(event)" ondrop="handleDrop(event, 'featured')" ondragend="handleDragEnd(event)" data-id="{{ $img->id }}" data-caption="{{ $img->caption ?? '' }}" data-published="{{ $img->is_published ? 'true' : 'false' }}">
                                        <td class="p-2 text-gray-400">⋮⋮</td>
                                        <td class="p-2"><img src="{{ asset('storage/' . $img->image_path) }}" class="h-10 w-16 object-cover rounded"></td>
                                        <td class="p-2 truncate">{{ $img->caption ?? '—' }}</td>
                                        <td class="p-2">
                                            @if(!$img->is_published)
                                                <span class="text-xs px-2 py-1 bg-yellow-100 text-yellow-800 rounded">Draft</span>
                                            @else
                                                <span class="text-xs px-2 py-1 bg-green-100 text-green-800 rounded">Published</span>
                                            @endif
                                        </td>
                                        <td class="p-2 text-center"><button type="button" onclick="startEdit('featured', this.closest('tr'))" class="text-blue-600 hover:underline">Edit</button></td>
                                        <td class="p-2 text-center"><button type="button" onclick="deleteImage({{ $img->id }})" class="text-red-600 hover:underline">Delete</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </x-modal>

    <!-- Premium Modal -->
    <x-modal name="manage-premium">
        <div class="p-6 max-h-[90vh] overflow-y-auto">
            <h3 class="text-lg font-semibold mb-2">Manage Premium Images</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Upload premium section images. Drag to reorder.</p>

            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mb-6">
                <h4 class="font-semibold text-sm mb-4 text-gray-900 dark:text-white">Upload Premium Images</h4>
                <form id="premium-form" class="space-y-4">
                    <input type="hidden" id="premium-edit-id" value="">

                    <!-- Drag-drop zone -->
                    <div id="premium-dropzone" class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center cursor-pointer hover:border-purple-500 transition" ondrop="handleDropZone(event, 'premium')" ondragover="event.preventDefault(); event.target.closest('#premium-dropzone')?.classList.add('border-purple-500', 'bg-purple-50')" ondragleave="event.target.closest('#premium-dropzone')?.classList.remove('border-purple-500', 'bg-purple-50')">
                        <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Drag images here or click to select</p>
                        <input type="file" id="premium-images" name="images" accept="image/*" multiple class="hidden" onchange="previewBulkImages(event, 'premium')">
                        <button type="button" onclick="document.getElementById('premium-images').click()" class="mt-2 text-sm text-purple-600 hover:text-purple-700 font-medium">Select Multiple Files</button>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Up to 20 images, up to 2MB each</p>
                    </div>

                    <!-- Bulk preview grid -->
                    <div id="premium-preview-grid" class="grid grid-cols-3 gap-4" style="display:none;"></div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Caption (for single edit)</label>
                        <textarea id="premium-desc" placeholder="Add a caption..." class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-800 dark:text-white text-sm" rows="2"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <input type="checkbox" id="premium-published" checked class="mr-2"> Publish Immediately
                        </label>
                    </div>

                    <button type="button" onclick="uploadImage('premium')" class="w-full px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white rounded-lg font-semibold text-sm">Upload</button>
                </form>

                @if($premiumImages->count())
                    <div class="mt-6">
                        <h4 class="font-semibold text-sm mb-3 text-gray-900 dark:text-white">Current Premium Images (Drag to Reorder)</h4>
                        <table id="premium-table" class="w-full text-sm">
                            <thead>
                                <tr class="border-b">
                                    <th class="p-2 w-8">↕️</th>
                                    <th class="p-2 text-left">Preview</th>
                                    <th class="p-2 text-left">Caption</th>
                                    <th class="p-2 text-left">Status</th>
                                    <th class="p-2 text-center">Edit</th>
                                    <th class="p-2 text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody id="premium-tbody">
                                @foreach($premiumImages as $img)
                                    <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-600 cursor-move" draggable="true" ondragstart="handleDragStart(event)" ondragover="handleDragOver(event)" ondrop="handleDrop(event, 'premium')" ondragend="handleDragEnd(event)" data-id="{{ $img->id }}" data-caption="{{ $img->caption ?? '' }}" data-published="{{ $img->is_published ? 'true' : 'false' }}">
                                        <td class="p-2 text-gray-400">⋮⋮</td>
                                        <td class="p-2"><img src="{{ asset('storage/' . $img->image_path) }}" class="h-10 w-16 object-cover rounded"></td>
                                        <td class="p-2 truncate">{{ $img->caption ?? '—' }}</td>
                                        <td class="p-2">
                                            @if(!$img->is_published)
                                                <span class="text-xs px-2 py-1 bg-yellow-100 text-yellow-800 rounded">Draft</span>
                                            @else
                                                <span class="text-xs px-2 py-1 bg-green-100 text-green-800 rounded">Published</span>
                                            @endif
                                        </td>
                                        <td class="p-2 text-center"><button type="button" onclick="startEdit('premium', this.closest('tr'))" class="text-blue-600 hover:underline">Edit</button></td>
                                        <td class="p-2 text-center"><button type="button" onclick="deleteImage({{ $img->id }})" class="text-red-600 hover:underline">Delete</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </x-modal>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        let draggedRow = null;

        // ===== Preview Functions =====
        function previewImage(event, type) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = (e) => {
                const preview = document.getElementById(`${type}-preview`);
                const img = document.getElementById(`${type}-preview-img`);
                const name = document.getElementById(`${type}-preview-name`);

                img.src = e.target.result;
                name.textContent = file.name;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }

        function previewBulkImages(event, type) {
            const files = Array.from(event.target.files);
            const grid = document.getElementById(`${type}-preview-grid`);
            grid.innerHTML = '';

            if (files.length === 0) {
                grid.style.display = 'none';
                return;
            }

            grid.style.display = 'grid';

            files.forEach((file, idx) => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const item = document.createElement('div');
                    item.className = 'relative rounded-lg overflow-hidden bg-gray-200 aspect-square';
                    item.innerHTML = `
                        <img src="${e.target.result}" class="w-full h-full object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-black/50 text-white text-xs p-1 truncate">
                            ${file.name}
                        </div>
                    `;
                    grid.appendChild(item);
                };
                reader.readAsDataURL(file);
            });
        }

        function handleDropZone(event, type) {
            event.preventDefault();
            const files = Array.from(event.dataTransfer.files).filter(f => f.type.startsWith('image/'));

            if (type === 'hero' && files.length > 0) {
                // Single file for hero
                const input = document.getElementById('hero-image');
                const dt = new DataTransfer();
                dt.items.add(files[0]);
                input.files = dt.files;
                previewImage({ target: input }, 'hero');
            } else if ((type === 'featured' || type === 'premium') && files.length > 0) {
                // Multiple files
                const input = document.getElementById(`${type}-images`);
                const dt = new DataTransfer();
                files.forEach(f => dt.items.add(f));
                input.files = dt.files;
                previewBulkImages({ target: input }, type);
            }

            event.target.closest(`#${type}-dropzone`)?.classList.remove('border-red-500', 'border-blue-500', 'border-purple-500', 'bg-red-50', 'bg-blue-50', 'bg-purple-50');
        }

        // ===== Upload & Edit Functions =====
        function uploadImage(type) {
            const editId = document.getElementById(`${type}-edit-id`).value;
            const fileInput = document.getElementById(`${type}-image`) || document.getElementById(`${type}-images`);
            const descInput = document.getElementById(`${type}-desc`);
            const publishedCheckbox = document.getElementById(`${type}-published`);
            const scheduleInput = document.getElementById(`${type}-schedule`);

            let files = [];
            if (fileInput && fileInput.files.length > 0) {
                files = Array.from(fileInput.files);
            }

            if (!editId && files.length === 0) {
                alert('Please select at least one image');
                return;
            }

            const formData = new FormData();
            if (files.length > 0) {
                if (editId || files.length === 1) {
                    formData.append('image', files[0]);
                } else {
                    files.forEach(f => formData.append('images[]', f));
                }
            }
            formData.append('caption', descInput ? descInput.value : '');

            // Send boolean as string (Laravel will cast it properly)
            const isPublished = publishedCheckbox ? (publishedCheckbox.checked ? 'true' : 'false') : 'true';
            formData.append('is_published', isPublished);
            console.log('FormData is_published:', isPublished, 'type:', typeof isPublished);

            // clear schedule when publish immediately is selected, avoiding future filter
            if (isPublished === 'true' && scheduleInput) {
                scheduleInput.value = '';
            }

            if (scheduleInput && scheduleInput.value) {
                const formatted = scheduleInput.value.replace('T', ' ');
                formData.append('scheduled_publish_at', formatted);
                console.log('Scheduled publish at:', formatted);
            }

            if (!editId) formData.append('type', type);
            formData.append('_token', csrfToken);

            // Log form data for debugging
            console.log('Uploading with is_published:', isPublished, 'type:', type);

            let url = '/welcome-images';
            let method = 'POST';
            if (editId) {
                url += '/' + editId;
                method = 'PATCH';
            }

            fetch(url, {
                method,
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(r => {
                    const contentType = r.headers.get('content-type');
                    if (!r.ok) {
                        return r.text().then(text => {
                            console.error('Response Error:', r.status, r.statusText);
                            console.error('Content-Type:', contentType);
                            console.error('Response body:', text);
                            throw new Error(`HTTP ${r.status}: ${text.substring(0, 200)}`);
                        });
                    }
                    return r.json().catch(e => {
                        console.error('JSON parse error:', e);
                        console.error('Content-Type:', contentType);
                        throw new Error('Invalid JSON response from server');
                    });
                })
                .then(data => {
                    console.log('Upload response:', data);
                    if (data.success) {
                        alert(`Successfully uploaded ${data.count || 1} image(s)`);
                        location.reload();
                    } else {
                        alert(data.message || 'Upload failed');
                    }
                })
                .catch(e => {
                    console.error('Upload error:', e);
                    alert(`Upload failed: ${e.message}`);
                });
        }

        function startEdit(type, row) {
            const id = row.dataset.id || row.closest('tr').dataset.id;
            const caption = row.dataset.caption || row.closest('tr').dataset.caption || '';
            const published = (row.dataset.published || row.closest('tr').dataset.published) === 'true';

            document.getElementById(`${type}-desc`).value = caption;
            document.getElementById(`${type}-edit-id`).value = id;
            document.getElementById(`${type}-published`).checked = published;

            // Hide file input for edit
            const dropzone = document.getElementById(`${type}-dropzone`);
            if (dropzone) dropzone.style.opacity = '0.5';

            document.querySelector(`#${type}-form`)?.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }

        function deleteImage(id) {
            if (!confirm('Delete this image permanently?')) return;
            fetch(`/welcome-images/${id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': csrfToken }
            })
                .then(r => r.json())
                .then(data => {
                    if (data.success) location.reload();
                })
                .catch(e => {
                    console.error(e);
                    alert('Delete failed');
                });
        }

        // ===== Drag & Drop Reordering =====
        function handleDragStart(event) {
            draggedRow = event.target.closest('tr');
            event.dataTransfer.effectAllowed = 'move';
            draggedRow.style.opacity = '0.5';
        }

        function handleDragOver(event) {
            event.preventDefault();
            event.dataTransfer.dropEffect = 'move';
        }

        function handleDrop(event, type) {
            event.preventDefault();
            const targetRow = event.target.closest('tr');

            if (draggedRow && targetRow && draggedRow !== targetRow) {
                const tbody = document.getElementById(`${type}-tbody`);
                if (draggedRow.compareDocumentPosition(targetRow) & Node.DOCUMENT_POSITION_FOLLOWING) {
                    draggedRow.parentNode.insertBefore(draggedRow, targetRow);
                } else {
                    draggedRow.parentNode.insertBefore(draggedRow, targetRow.nextSibling);
                }

                // Update sort_order on server
                const ids = Array.from(tbody.querySelectorAll('tr')).map(tr => tr.dataset.id);
                updateSortOrder(type, ids);
            }
        }

        function handleDragEnd(event) {
            if (draggedRow) {
                draggedRow.style.opacity = '1';
                draggedRow = null;
            }
        }

        function updateSortOrder(type, ids) {
            fetch('/welcome-images/reorder', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ type, ids })
            })
                .then(r => r.json())
                .catch(e => console.error('Reorder failed:', e));
        }
    </script>
</x-app-layout>
