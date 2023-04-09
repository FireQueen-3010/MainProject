import sys
import pandas as pd
from sklearn.feature_selection import SelectKBest, mutual_info_regression
from sklearn.preprocessing import LabelEncoder
import matplotlib.pyplot as plt

# Load the dataset
#filename = sys.argv[1]
data = pd.read_csv('uploads/BigBasket.csv')

# Encode categorical variables using label encoding
le = LabelEncoder()
for column in data.columns:
    data[column] = le.fit_transform(data[column])

X = data[['index','product','category','sub_category','brand','sale_price','market_price','type','rating','description']]

y = data['brand']

# Use SelectKBest with mutual information to find the top 5 features
selector = SelectKBest(score_func=mutual_info_regression, k=5)
selector.fit(X, y)

# Print the top 5 features and their mutual information scores
top_features = selector.scores_
top_features_index = selector.get_support(indices=True)
feature_names = []
scores = []
for i, feature in enumerate(X.columns[top_features_index]):
    feature_names.append(feature)
    scores.append(top_features[top_features_index[i]])

# Sort the features based on their scores in descending order
sorted_features = sorted(zip(feature_names, scores), key=lambda x: x[1], reverse=True)
print("Top 5 features:")
for i in range(5):
    print(f'{i+1}. {sorted_features[i][0]} ({sorted_features[i][1]:.4f})')

# Define k-anonymity rules for the top 5 features
k_anonymity_rules = {
    'index': None,
    'product': 2,
    'category': 3,
    'sub_category': 3,
    'brand': 2
}

# Apply k-anonymity to the top 5 features based on the defined rules
for feature in sorted_features[:5]:
    feature_name = feature[0]
    k = k_anonymity_rules.get(feature_name, None)
    if k is not None:
        X[feature_name] = X[feature_name] // k * k

# Save the anonymized data to a new CSV file
output_filename = 'BigBasket_anonymized.csv'
X.to_csv(output_filename, index=False)

# Plot the feature selection scores
plt.bar(feature_names, scores)

# # Add labels and title
plt.xlabel('Feature')
plt.ylabel('Score')
plt.title('Feature Selection Scores')

# Show the plot
plt.show()

# Print the filenames of the output files
print(f'Anonymized dataset saved to {output_filename}')
# print(f'Feature selection scores plot saved to {plot_filename}')
