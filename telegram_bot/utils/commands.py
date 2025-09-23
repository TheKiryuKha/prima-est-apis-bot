from aiogram import Bot
from aiogram.types import BotCommand, BotCommandScopeDefault


async def set_commands(bot: Bot):
    commands = [
        BotCommand(
            command='start',
            description='Запускает Бота'
        ),
        BotCommand(
            command='help',
            description='Помощь'
        ),
        BotCommand(
            command='shop',
            description='Магазин'
        ),
        BotCommand(
            command='cart',
            description='Корзина'
        )
    ]

    await bot.set_my_commands(commands, BotCommandScopeDefault())