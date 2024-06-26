@php
    $uniqueId = uniqid();
    $currentTags = !empty($dataTypeContent->{$row->field}) ? json_decode($dataTypeContent->{$row->field}) : [];
    $currentTags = is_array($currentTags) ? $currentTags : [];
@endphp

<div id="{{ $row->field }}-tag-container-{{ $uniqueId }}">
    @foreach ($currentTags as $tag)
        <span class="badge badge-primary mr-1">
            {{ $tag }}
            <button type="button" class="btn btn-sm btn-danger ml-1"
                onclick="removeTag('{{ $uniqueId }}', '{{ $tag }}')">
                X
            </button>
        </span>
    @endforeach
</div>

<div class="form-group">
    <input type="text" class="form-control" id="{{ $row->field }}-tag-input-{{ $uniqueId }}">
    <input type="hidden" name="{{ $row->field }}" id="{{ $row->field }}-hidden-{{ $uniqueId }}"
        value='{{ json_encode($currentTags) }}'>
    <small class="form-text text-muted">Press Enter to add tags</small>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function initializeTagInput(uniqueId) {
            const tagContainer = document.getElementById('{{ $row->field }}-tag-container-' + uniqueId);
            const tagInput = document.getElementById('{{ $row->field }}-tag-input-' + uniqueId);
            const tagsHidden = document.getElementById('{{ $row->field }}-hidden-' + uniqueId);
            let tags = {!! json_encode($currentTags) !!};

            updateTagDisplay();

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
                    removeButton.innerHTML = 'X';
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

            window.removeTag = function(id, tag) {
                if (id === uniqueId) {
                    removeTag(tag);
                }
            };
        }

        initializeTagInput('{{ $uniqueId }}');
    });
</script>
