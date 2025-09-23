from aiogram import Bot
from aiogram.types import CallbackQuery
from utils.api import add_product_to_cart, get_cart, get_cart_with_items, destroy_cart
from keyboards.options_keyboard import options_kb
from utils.clear_messages import clear
from keyboards.cart_keyboard import create_kb

async def show(update: CallbackQuery, bot: Bot):
    await clear(update, bot)

    message = f"<b>● Товары:</b>\n"

    cart = get_cart_with_items(update.from_user.id)

    if cart['attributes']['products_amount'] == 0:
        message += f"Вы ещё не добавили товары"
        await bot.send_message(chat_id=update.from_user.id, text=message, parse_mode="HTML")
        return
    
    for item in cart['attributes']['items']:
        message += f"\n<b>{item['attributes']['title']}</b>"
        message += f"\n{item['attributes']['amount']} x {item['attributes']['formatted_price']}"
        message += f"\n———"
    message += f"\n\n<b>● Итого:</b> \n\n {cart['attributes']['formatted_price']} ({cart['attributes']['products_amount']} шт.)"

    await bot.send_message(
        chat_id=update.from_user.id,
        text=message,
        reply_markup=create_kb(),
        parse_mode="HTML"
    )
    

async def store(update: CallbackQuery, bot: Bot): 
    update.answer()

    option_id = update.data.split('_')[1]

    product = add_product_to_cart(option_id, 1, update.from_user.id) 
    cart = get_cart(update.message.chat.id)
    
    update.answer(f"Добавлено в корзину")

    await bot.edit_message_reply_markup(
        chat_id= update.message.chat.id,
        message_id= update.message.message_id,
        reply_markup=options_kb(product['attributes']['options'], cart)
    );

async def destroy(update: CallbackQuery, bot: Bot):
    update.answer()

    cart = get_cart(update.from_user.id)
    destroy_cart(cart['id'])

    await show(update, bot)