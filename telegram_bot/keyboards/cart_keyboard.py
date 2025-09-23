from aiogram.utils.keyboard import InlineKeyboardBuilder

def create_kb():
    kb = InlineKeyboardBuilder()

    kb.button(
        text='Оформить заказ',
        callback_data='test'
    )
    kb.adjust(1)

    kb.button(
        text='Изменить',
        callback_data='change'
    )
    kb.button(
        text='Очистить',
        callback_data='clear_cart'
    )
    kb.adjust(2)

    return kb.as_markup()