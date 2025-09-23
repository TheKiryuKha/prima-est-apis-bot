from aiogram import Bot
from aiogram.types import CallbackQuery
from utils.api import delete_cart_item
from actions.show_cart import show_cart_edit
from utils.api import get_cart_with_items, add_product_to_cart
from utils.clear_messages import clear

async def destroy(update: CallbackQuery, bot: Bot):
    await update.answer()
    data_parts = update.data.split(':')
     
    item_id = data_parts[1]  

    delete_cart_item(item_id)

    cart = get_cart_with_items(update.from_user.id)

    await clear(update, bot)
    await show_cart_edit(cart, update, bot)

async def store(update: CallbackQuery, bot: Bot):
    await update.answer()
    data_parts = update.data.split(':')
    
    option_id = data_parts[1]

    add_product_to_cart(option_id, update.from_user.id)

    cart = get_cart_with_items(update.from_user.id)

    await clear(update, bot)
    await show_cart_edit(cart, update, bot)
