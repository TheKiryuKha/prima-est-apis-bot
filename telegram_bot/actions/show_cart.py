from aiogram import Bot
from aiogram.types import CallbackQuery
from keyboards.cart_keyboard import create_kb
from keyboards.edit_cart_keyboard import edit_cart_keyboard

async def show_cart(cart, update, bot):

    message = f"<b>● Товары:</b>\n"

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

async def show_cart_edit(cart, update, bot):
    
    message = f"<b>● Товары:</b>\n"

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
        reply_markup=edit_cart_keyboard(cart),
        parse_mode="HTML"
    )