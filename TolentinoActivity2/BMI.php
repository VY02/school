# File: student_profile.py

class StudentProfile:
    def init(self, name, age, address, contact_number, birthday, gender, blood_type, height, weight):
        self.name = name
        self.age = age
        self.address = address
        self.contact_number = contact_number
        self.birthday = birthday
        self.gender = gender
        self.blood_type = blood_type
        self.height = height
        self.weight = weight

    def calculate_bmi_metric(self):
        bmi_metric = self.weight / (self.height  2)
        return round(bmi_metric, 2)

    def calculate_bmi_imperial(self):
        bmi_imperial = (703 * self.weight) / (self.height  2)
        return round(bmi_imperial, 2)

# Example Usage
if name == "main":
    student = StudentProfile(
        name="Emily Johnson",
        age=18,
        address="123 Main Street, Cityville, State, Zip Code",
        contact_number="(555) 123-4567",
        birthday="March 10, 2006",
        gender="Female",
        blood_type="A+",
        height=1.65,  # in meters
        weight=58  # in kilograms
    )

    print("BMI (Metric):", student.calculate_bmi_metric())
    print("BMI (Imperial):", student.calculate_bmi_imperial())