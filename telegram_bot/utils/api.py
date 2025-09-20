import requests
from config import API_URL

def get_categories():
    return requests.get(API_URL + 'categories').json()['data']

def get_category(category_id: int):
    return requests.get(API_URL + 'categories/' + str(category_id)).json()['data']

def get_products(category_id: int):
    return requests.get(API_URL + 'categories/' + str(category_id) + '/products').json()['data']

def get_product(product_id: int):
    return requests.get(API_URL + 'products/' + str(product_id)).json()['data']