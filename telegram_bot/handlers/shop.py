from aiogram import Bot
from aiogram.types import Message
from keyboards.categories_keyboard import create_kb

async def shop(message: Message, bot: Bot):

    chat_id = message.from_user.id

    await bot.delete_message(chat_id, message.message_id)

    try:
        await bot.delete_message(chat_id, message.message_id - 1)
    except Exception:
        pass

    await bot.send_message(chat_id, f'Наши товары:', reply_markup=create_kb())
