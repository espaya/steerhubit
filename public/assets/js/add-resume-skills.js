document.addEventListener('DOMContentLoaded', function() {
    // Get elements with null checks
    const skillInput = document.getElementById('skillInput');
    const skillTags = document.getElementById('skillTags');
    const skillMessage = $('#skill-messge');
    const saveButton = document.getElementById('save-resume-skills');

    // Only proceed if required elements exist
    if (!skillInput || !skillTags || !saveButton) {
        console.error('Required elements not found in DOM');
        return;
    }

    // Load existing skills from server on page load
    loadExistingSkills();
    
    // Add delete functionality to existing skills (only if they exist)
    const existingDeleteButtons = document.querySelectorAll('.skill__tags .fa-xmark');
    if (existingDeleteButtons.length > 0) {
        existingDeleteButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const skill = this.closest('li').querySelector('.skill__item').textContent;
                deleteSkill(skill);
                this.closest('li').remove();
            });
        });
    }
    
    // Add event listeners only if elements exist
    skillInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && this.value.trim() !== '') {
            const skill = this.value.trim();
            saveSkill(skill);
            this.value = '';
        }
    });
    
    saveButton.addEventListener('click', function(e) {
        e.preventDefault();
        const skill = skillInput.value.trim();
        if (skill) {
            saveSkill(skill);
            skillInput.value = '';
        }
    });
    
    function addSkillToUI(skillName) {
        const skillItem = document.createElement('li');
        skillItem.innerHTML = `
            <span class="skill__item">${skillName}</span>
            <span><i class="fa-regular fa-xmark"></i></span>
        `;
        
        const deleteButton = skillItem.querySelector('.fa-xmark');
        if (deleteButton) {
            deleteButton.addEventListener('click', function() {
                deleteSkill(skillName);
                skillItem.remove();
            });
        }
        
        // Insert before the "add" button if it exists
        const addButton = document.querySelector('.skill__item__add');
        if (addButton && addButton.closest('li')) {
            addButton.closest('li').before(skillItem);
        } else if (skillTags) {
            skillTags.appendChild(skillItem);
        }
    }
    
    function loadExistingSkills() {
        $.ajax({
            url: '/candidate-dashboard/resume/skills/get',
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.skills && skillTags) {
                    skillTags.innerHTML = ''; // Clear existing skills
                    const skills = response.skills.split(', ');
                    skills.forEach(skill => {
                        if (skill.trim()) {
                            addSkillToUI(skill.trim());
                        }
                    });
                }
            },
            error: function(xhr) {
                console.error('Failed to load skills:', xhr.responseText);
            }
        });
    }
    
    function showMessage(message, isError = false) {
        if (!skillMessage.length) return;
        
        const color = isError ? 'red' : 'green';
        skillMessage.html(`<div style="color: ${color};">${message}</div>`);
        
        setTimeout(() => {
            skillMessage.html('');
        }, 3000);
    }
    
    function saveSkill(skill) {
        $.ajax({
            url: '/candidate-dashboard/resume/skills',
            type: 'POST',
            data: { skill: skill },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (skillTags) {
                    skillTags.innerHTML = '';
                    loadExistingSkills();
                }
                showMessage(response.message);
            },
            error: function(xhr) {
                let message = 'Failed to save skill.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                showMessage(message, true);
            }
        });
    }
    
    function deleteSkill(skill) {
        $.ajax({
            url: '/candidate-dashboard/resume/skills/delete',
            type: 'POST',
            data: { skill: skill },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                showMessage(response.message);
            },
            error: function(xhr) {
                let message = 'Failed to delete skill.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                showMessage(message, true);
            }
        });
    }
});