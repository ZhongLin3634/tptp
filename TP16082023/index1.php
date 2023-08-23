<!DOCTYPE html>
<html>
<head>
    <title>Form Submission</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <h1 class="register-complaint-header">Register Complaint</h1>
    <div class="container">
        <div class="form-container">
            <form method="post" action="aaa.php">
            <label for="complaintType">Type of Complaint:</label>
                <select id="complaintType" name="complaintType" required>
                    <option value="">Select a complaint type</option>
                    <option value="Issue">Issue</option>
                    <option value="Feedback">Feedback</option>
                    <option value="Complaint">Complaint</option>
                    <option value="Dissolve">Dissolve</option>
                    <option value="Fraud">Fraud</option>
                    <option value="Illegal Activity">Illegal Activity</option>
                    <option value="Corruption">Corruption</option>
                    <option value="Harassment">Harassment</option>
                    <!-- Options remain the same -->
                </select>
                <label for="location">Location:</label>
                <input type="text" id="Location" name="Location" required><br>
                <label for="complainCategory">Category:</label>
                <select id="complainCategory" name="complainCategory" required>
                  <option value="">Select a category</option>
                  <option value="Issues or Incident">Issues or Incident</option>
                  <option value="Policies and Procedures">Policies and Procedures</option>
                  <option value="Legal and Regulatory Compliance">Legal and Regulatory Compliance</option>
                  <option value="Company Culture">Company Culture</option>
                  <option value="Organizational Structure">Organizational Structure</option>
                  <option value="Employee Well-being">Employee Well-being</option>
                  <option value="Employee Engagement">Employee Engagement</option>
                </select>
                <label for="subCategory">Sub Category:</label>
                <select id="subCategory" name="subCategory" required>
                    <option value="">Select a sub-category</option>
                    <!-- Add sub-category options here under the relevant main category -->
                    <optgroup label="Issues or Incident">
                        <option value="Ethical Violations">Ethical Violations</option>
                        <option value="Misconduct">Misconduct</option>
                        <option value="Safety and Security">Safety and Security</option>
                        <option value="Environmental Concerns">Environmental Concerns</option>
                    </optgroup>
                    <optgroup label="Policies and Procedures">
                        <option value="Code of Conduct">Code of Conduct</option>
                        <option value="Company Policy">Company Policy</option>
                    </optgroup>
                    <optgroup label="Legal and Regulatory Compliance">
                        <option value="Compliance with Company Protection Laws">Compliance with Company Protection Laws</option>
                    </optgroup>
                    <optgroup label="Company Culture">
                        <option value="Ethics and Integrity">Ethics and Integrity</option>
                        <option value="Diversity and Inclusion">Diversity and Inclusion</option>
                        <option value="Values and Mission">Values and Mission</option>
                    </optgroup>
                    <optgroup label="Organizational Structure">
                        <option value="Departmental Communication">Departmental Communication</option>
                        <option value="Reporting Hierarchies">Reporting Hierarchies</option>
                    </optgroup>
                    <optgroup label="Employee Well-being">
                        <option value="Health and Safety">Health and Safety</option>
                        <option value="Work-Life Balance">Work-Life Balance</option>
                    </optgroup>
                    <optgroup label="Employee Engagement">
                        <option value="Salary">Salary</option>
                        <option value="Benefits">Benefits</option>
                        <option value="Work life balance">Work life balance</option>
                        <option value="Recognition and Rewards">Recognition and Rewards</option>
                        <option value="Career Development">Career Development</option>
                        <option value="Team Collaboration">Team Collaboration</option>
                    </optgroup>
                </select>
                <label for="Subject">Subject</label>
                <input type="text" id="Subject" name="Subject" required>
                <label for="file1">Attachment 1:</label>
                <input type="file" id="file1" name="file1">
                <input type="file" id="file2" name="file2">
                <input type="file" id="file3" name="file3">
                <br>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea><br>
                
                <br>
                <div class="button">
                <button type="submit" value="Submit">Submit</button>
                <button type="reset" value="Reset" style="margin-left:740px">Reset</button>
</div>



                <!-- Add other form elements with PHP data here -->
                <!-- ... -->

            </form>
        </div>
    </div>
</body>
</html>
