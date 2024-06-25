@php
    // Extract existing tags from the database field
    $currentTags = !empty($dataTypeContent->{$row->field}) ? json_decode($dataTypeContent->{$row->field}) : [];
    $currentTags = is_array($currentTags) ? $currentTags : [];
@endphp

<div id="{{ $row->field }}-tag-container">
    @foreach ($currentTags as $tag)
        <span class="badge badge-primary mr-1">
            {{ $tag }}
            <button type="button" class="btn btn-sm btn-danger ml-1" onclick="removeTag('{{ $tag }}')">
                <i class="fa fa-times"></i>
            </button>
        </span>
    @endforeach
</div>

<div class="form-group">
    <label>{{ $row->display_name }}</label>
    <input type="text" class="form-control" id="{{ $row->field }}-tag-input">
    <input type="hidden" name="{{ $row->field }}" id="{{ $row->field }}-hidden"
        value='{{ json_encode($currentTags) }}'>
    <small class="form-text text-muted">Press Enter to add tags</small>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tagContainer = document.getElementById('{{ $row->field }}-tag-container');
        const tagInput = document.getElementById('{{ $row->field }}-tag-input');
        const tagsHidden = document.getElementById('{{ $row->field }}-hidden');
        let tags = {!! json_encode($currentTags) !!};

        tagInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && tagInput.value.trim() !== '') {
                e.preventDefault();
                const tag = tagInput.value.trim();
                if (!tags.includes(tag)) {
                    tags.push(tag);
                    updateTagDisplay();
                }
                tagInput.value = '';
            }
        });

        function updateTagDisplay() {
            tagContainer.innerHTML = '';
            tags.forEach(tag => {
                const tagElement = document.createElement('span');
                tagElement.classList.add('badge', 'badge-primary', 'mr-1');
                tagElement.textContent = tag;

                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.classList.add('btn', 'btn-sm', 'btn-danger', 'ml-1');
                removeButton.innerHTML = '<i class="fa fa-times"></i>';
                removeButton.onclick = function() {
                    removeTag(tag);
                };

                tagElement.appendChild(removeButton);
                tagContainer.appendChild(tagElement);
            });

            tagsHidden.value = JSON.stringify(tags);
        }

        function removeTag(tagToRemove) {
            tags = tags.filter(tag => tag !== tagToRemove);
            updateTagDisplay();
        }
    });
</script>
