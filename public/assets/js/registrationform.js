    document.addEventListener('DOMContentLoaded', function () {
        const showCandidateBtn = document.getElementById('showCandidateForm');
        const showEmployerBtn = document.getElementById('showEmployerForm');
        const candidateForm = document.getElementById('candidateForm');
        const employerForm = document.getElementById('employerForm');

        // Show Candidate form and hide Employer form + button
        showCandidateBtn.addEventListener('click', function () {
            candidateForm.style.display = 'block';
            employerForm.style.display = 'none';
            showCandidateBtn.style.display = 'none'; // Hide Candidate Button
            showEmployerBtn.style.display = 'inline-block'; // Show Employer Button
        });

        // Show Employer form and hide Candidate form + button
        showEmployerBtn.addEventListener('click', function () {
            employerForm.style.display = 'block';
            candidateForm.style.display = 'none';
            showEmployerBtn.style.display = 'none'; // Hide Employer Button
            showCandidateBtn.style.display = 'inline-block'; // Show Candidate Button
        });
    });
