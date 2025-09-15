from aiogram.utils.keyboard import InlineKeyboardBuilder


def create_kb():
    categories = [
        {
            'id': 1,
            'attributes': {
                'title': 'Мёд'
            }
        },
        {
            'id': 2,
            'attributes': {
                'title': 'Воск'
            }
        },
        {
            'id': 3,
            'attributes': {
                'id': 1,
                'title': 'Забрус'
            }
        },
    ]
    kb = InlineKeyboardBuilder()
    for category in categories:
        kb.button(
            text=f'{category['attributes']['title']}',
            callback_data=f'{category['id']}'
        )
    kb.adjust(1)
    return kb.as_markup()